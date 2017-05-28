declare module "*.vue" {
    import Vue from 'vue'
    export default typeof Vue
}
declare module "bootstrap-vue"
declare module "vue-upload-component"{
    export default {};
}

declare module "lodash"{
    export function debounce(x : () => void, timeout: number) : () => void;
}
declare module "assert"