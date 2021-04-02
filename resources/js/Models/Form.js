export default class Form {
    async submit(method, url, parameters = [])
    {
        let data = [];

        if (['get', 'delete'].includes(method)) {
            data = {
                params : (parameters.data || parameters || [])
            }
        } else {
            data = (parameters || []);
        }

        return window.axios[method](url, data)
            .then(this.onSuccess.bind(this))
            .catch(this.onFail.bind(this));
    }

    onSuccess(response)
    {
        return response.data;
    }

    onFail(errors)
    {
        return errors.response.data;
    }
}
