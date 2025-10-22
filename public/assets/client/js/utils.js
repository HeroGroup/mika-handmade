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
        console.log(response.message);
    });

    xhr.send(params.formData);
}
