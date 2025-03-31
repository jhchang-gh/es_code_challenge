

document.addEventListener('DOMContentLoaded', 
    function() {

        let api = new EmployeeApi();

        api.requireLogin().then(
            function( auth_data ) {

                let employee_id = auth_data.id;

                const form = document.getElementById('employee_record');

                loadData(employee_id).then(
                    function(employee_data) {
                        /* password hash is coming through!!! */
                        console.log(employee_data);
                        FormFiller.apply(employee_data);
                    }
                )
        
                form.addEventListener('submit',
                    function( e ) {
        
                        e.preventDefault();

                        // Redundant variable
                        //let api = new EmployeeApi();

                        // Added code to setData on form submit
                        const data = new FormData(this);
                        const entries = Object.fromEntries(data.entries());
                        api.setData(employee_id,entries);
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

