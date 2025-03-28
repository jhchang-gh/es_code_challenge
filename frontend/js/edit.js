

document.addEventListener('DOMContentLoaded', 
    function() {

        let api = new EmployeeApi();

        api.requireLogin().then(
            function( auth_data ) {

                let employee_id = auth_data.id;

                const form = document.getElementById('employee_record');

                loadData(employee_id).then(
                    function(employee_data) {
                        console.log(employee_data);
                        /* password hash is coming through!!! */
                        FormFiller.apply(employee_data);
                    }
                )
        
                form.addEventListener('submit',
                    function( e ) {
        
                        e.preventDefault();

                        //let api = new EmployeeApi();

                        let data = new FormData(this);
                        let entries = Object.fromEntries(data.entries());
                        console.log(typeof(entries));
                        console.log(entries);
                        api.setData(employee_id,entries);
                        return false;
                    }
                );
            }
        );
    }
);

const loadData = function( id ) {

    let api = new EmployeeApi();
    return api.getData(id);
    
}

