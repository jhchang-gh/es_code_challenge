class FormFiller {

    static apply(data) {
        console.log('formfiller apply');
        let key;

        for ( key in data ) {
            console.log(key);
            if ( document.getElementById(key) ) {
                console.log('key filling in');
                document.getElementById(key).setAttribute('value', data[key]);
            }
        }

    }

}