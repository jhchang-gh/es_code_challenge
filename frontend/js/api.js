// I like the construction of this class in general
// Specific functions feeding into a master function
class EmployeeApi {

    requireLogin() {

        let authRequest = this.doRequest('auth', { 'req': 'requireLogin' } );

        authRequest.catch (
            function( data ) {
                document.location.href = '/frontend/login.html';
            }
        )

        return authRequest;
    }

    doLogin( username, password ) {
        let req = this.doRequest('auth', 
            { 'req': 'doLogin', 'username': username, 'password': password }
        );

        return req;

    }

    getData(id) {
        // Added 'req' parameter to help differentiate between 'get' and 'set'
        return this.doRequest('employee', { 'req': 'get', id: id } );
    }

    // Added new function setData to set all employee fields on form submit
    setData(id, fields) {
        let req = { 'req': 'set', id: id};
        let params = {...req,...fields};
        return this.doRequest ('employee', params)
    }


    // Overall this is a pretty well-done function
    // Should probably validate better though
    // Need to protect against injection, here would be a good place to do it
    doRequest( obj_type, params ) {

        let param;
        let param_string = '';

        for( param in params ) {
            param_string = param_string + param + '=' + params[param] + '&';
        }

        let request = new XMLHttpRequest();

        return new Promise( 
            
            function(resolve, reject) {
                request.onreadystatechange = function() {
                    // Only run if the request is complete
                    if (request.readyState !== 4) return;
                    
                    if (request.status >= 200 && request.status < 300) {
                        // If successful
                        let ret = JSON.parse(request.responseText);

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
                        reject({
                            status: request.status,
                            statusText: request.statusText
                        });
                        
                    }
                }
                // File address was not properly set, added directory separators as necessary
                request.open("GET", "../../api.php?obj=" + obj_type + '&' + param_string, true);
                request.send();
            }
        );
        

    }
}