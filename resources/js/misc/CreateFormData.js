export function  createFormData(data){
    let formData = new FormData();
    for (var i in data)
    {
        formData.append(i,data[i]);
    }
    return formData;
}

