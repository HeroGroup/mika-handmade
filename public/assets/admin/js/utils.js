function createFormData(inputs) {
    let formData = new FormData();
    var inputKeys = Object.keys(inputs);
    inputKeys.forEach((key) => {
        formData.append(key, inputs[key]);
    });

    return formData;
}

function sendRequest(params) {
    var xhr = new XMLHttpRequest();
    xhr.open(params.method, params.route, true);
    xhr.addEventListener("load", function () {
        var response = JSON.parse(xhr.response);
        var liveToast = document.getElementById("liveToast");
        var toastBody = document.getElementById("toast-body");
        toastBody.innerHTML = response.message;

        if (response.status === 1) {
            liveToast.classList.remove("bg-danger");
            liveToast.classList.add("bg-success");

            if (params.successCallback) {
                params.successCallback();
            }
        } else {
            if (params.failCallback) {
                params.failCallback();
            }

            liveToast.classList.remove("bg-success");
            liveToast.classList.add("bg-danger");
        }

        var toast = new bootstrap.Toast(liveToast);
        toast.show();
    });

    xhr.send(params.formData);
}

function searchBase(baseRoute, set = {}) {
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);

    var params = Object.keys(set);
    params.forEach((key) => {
        urlParams.set(key, set[key]);
    });

    window.location.href = `${baseRoute}?${urlParams.toString()}`;
}
