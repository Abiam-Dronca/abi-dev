var paramsArray = window.location.search.substring(1).split('&');

for (var index = 0; index < paramsArray.length; index++) {
    var key = 'adt_ei';
    var param = paramsArray[index];
    if (param.indexOf(key) === 0) {
        var email = param.split(key + '=')[1];
        localStorage.setItem(key, email);
        paramsArray.splice(index, 1);
        history.replaceState(null, '', '?' + paramsArray.join('&'));
        break;
    }
}