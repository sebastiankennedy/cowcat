var Backend = window.Backend || {};

(function(Backend){
    Backend.ajax = {
        request: function(params){
            var params = params || {},
                _type = params.type || 'POST',
                _data = params.data || {},
                _successFunction = params.successFunction || function(){
                        window.location.reload();
                    },
                _errorFunction = params.errorFunction
        }
    };
})(Backend);