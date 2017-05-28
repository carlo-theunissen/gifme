/**
 * Created by carlotheunissen on 26/05/2017.
 */

import endpoints from "../../config/endPoints"
import { AxiosPromise, default as axios}  from "axios"

class ApiHelper{
    private createParameterString(data : {}) : string{
        return "?"+Object.keys(data).map((i) => i+'='+data[i]).join('&');
    }
    public get(name : string, data : {}): AxiosPromise{
        return axios.get(endpoints[name] + this.createParameterString(data));
    }
    public post(name : string, data : {}): AxiosPromise{
        return axios.post(endpoints[name], data);
    }
}
export default new ApiHelper();