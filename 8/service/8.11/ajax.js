
/**
 * 
 * @param {JSON} option 选项
 * @param {String} type 请求方式
 * @param {String} url 请求的地址
 * @param {String} data 请求服务的数据
 * @param {String} dataType 返回数据的格式
 * @param {Function} success 返回数据后要执行的函数
 * @param {Function} error 发生错误要执行的错误
 */
function ajax(option = {
    type: 'get',
    url: '',
    data: '',
    dataType: '',
    success: function (e) {},
    error: function (e) {
        console.error('ajax错误');
    }
}) {

    if(typeof option != 'object') {
        console.error('参数类型必须是json对象');
        return;
    }

    // 初始化url
    var url = option.url;
    if(!option.url) {
        console.error('未指定地址');
    }

    // 初始化请求方式
    var type = option.type;

    // 初始化请求的数据格式
    var data = '';

    if(typeof option.data == 'string') {
        data = option.data;
    } else {
        for (const key in option.data) {
            data += key + '=' + option.data[key] + '&';
        }
        data = data.slice(0, -1);
    }

    // 初始化返回的数据格式
    var dataType = option.dataType || 'json';

    // 初始化成功函数
    var success = option.success;
    if(typeof success != 'function') {
        console.error('缺少处理函数');
    }

    // 初始化错误函数
    var error = option.error;

    // 开始ajax
    // 创建ajax对象
    var obj = new XMLHttpRequest();

    // text json buffer bold
    if(dataType == 'text' || dataType == 'json') {
        obj.responseType = dataType;
    }

    // 监听
    var response
    obj.onreadystatechange = function () {
        if(obj.readyState == 4) {
            if(obj.status == 200) {
                if(dataType == 'xml') {
                    response = obj.responseXML();
                } else {
                    response = obj.response();
                    success(response);
                }
            } else {
                console.error('ajax错误');
            }
        }
    }
    

    // 指定请求方式及数据
    if(type == 'get') {
        obj.open(type, url+'?'+data);
        obj.send();
    } else if(type == 'post') {
        obj.open(type, url);
        obj.setRequestHeader("Conent")
        obj.send(data);
    }

   
}