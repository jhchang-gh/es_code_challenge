class EmployeeApi {

    requireLogin() {

        console.log('requirelogin');
        let authRequest = this.doRequest('auth', { 'req': 'requireLogin' } );

        authRequest.catch (
            function( data ) {
                document.location.href = '/frontend/login.html';
            }
        )

        return authRequest;
    }

    doLogin( username, password ) {
        console.log('dologin');
        let req = this.doRequest('auth', 
            { 'req': 'doLogin', 'username': username, 'password': password }
        );

        return req;

    }

    getData(id) {
        console.log('getdata');
        return this.doRequest('employee', { 'req': 'get', id: id } );
    }

    setData(id, fields) {
        console.log('setdata');
        console.log(typeof(fields));
        console.log(fields);
        let req = { 'req': 'set', id: id};
        console.log(typeof(req))
        let params = {...req,...fields};
        console.log(params);
        return this.doRequest ('employee', params)
    }

    doRequest( obj_type, params ) {
        console.log('dorequest');

        let param;
        let param_string = '';

        for( param in params ) {
            param_string = param_string + param + '=' + params[param] + '&';
        }
        console.log(param_string);
        let request = new XMLHttpRequest();

        return new Promise( 
            
            function(resolve, reject) {

                console.log('promise');
                request.onreadystatechange = function() {

                    console.log('readystatechange');
                    // Only run if the request is complete
                    if (request.readyState !== 4) return;
                    
                    if (request.status >= 200 && request.status < 300) {
                        // If successful
                        console.log('request success');
                        console.log(request);
                        let ret = JSON.parse(request.responseText);
                        console.log(ret);

                        if ( typeof(ret.success) != 'undefined' ) {
                            if ( ret.success != true ) {
                                reject({
                                    status: request.status,
                                    statusText: request.statusText
                                })
                            }
                        }
                        
                        console.log('responsetext', request.responseText);
				        resolve(ret);
                    } 
                    else {
                        console.log('request fail');
                        console.log(request);
                        reject({
                            status: request.status,
                            statusText: request.statusText
                        });
                        
                    }
                }
                request.open("GET", "../../api.php?obj=" + obj_type + '&' + param_string, true);
                request.send();
            }
        );
        

    }
}