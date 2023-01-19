import Store from './../store'
// import bootbox from 'bootbox';
//

axios.interceptors.sweetAlert = function (type, title, text) {
    Vue.swal({
        type: type,
        title: title,
        text: text,
        toast: true,
        showConfirmButton: false,
        position: 'top-end',
        timer: 10000,
        background: type == 'error' ? '#F2DEDE' : '#FCFCFC',
        padding: '5em',
    })
}

axios.interceptors.request.use(function (config) {
    /**
     * Shodo the The Spinner
     */
    Store.dispatch("loading/showLoadingSpinner");
    /**
     * Continue with the request
     */
    return config;
}, function (error) {
    Store.dispatch("loading/hideLoadingSpinner");
    // Do something with request error
    return Promise.reject(error);
});

axios.interceptors.response.use(function (response) {
    Store.dispatch("loading/hideLoadingSpinner");

    // axios.interceptors.sweetAlert('success', 'Well Done!', "Process Completed!")

    return response;
}, function (error) {
    // Do something with response error
    let response = error.response;

    axios.interceptors.sweetAlert('error', 'Ohh Crap!', response.data.message)
    Store.dispatch("loading/hideLoadingSpinner");

    if (response.status == 405) {
        return window.location.assign(response.responseURL)
    }

    if (response.status == 419) {
        let confirmation = confirm("This page has expired. Would you like to refresh this page?");

        if (confirmation) {
            window.location.reload();
        }
    }

    return Promise.reject(error);
});
