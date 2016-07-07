var Backend = window.Backend || {};

(function (Backend) {
    Backend.ajax = {
        request: function (params) {
            var params = params || {},
                _type = params.type || 'POST',
                _data = params.data || {},
                _successTitle = params.successTitle || "操作成功",
                _successFunction = params.successFunction || function () {
                        window.location.reload();
                    },
                _errorTitle = params.errorTitle || "操作失败",
                _errorFunction = params.errorFunction || function () {
                        swal(_errorTitle, '客户端请求错误');
                    };

            $.ajax({
                url: params.href,
                type: _type,
                data: _data,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function (response) {
                if (response.status == 1) {
                    swal({
                        title: response.message ? response.message : _successTitle,
                        type: 'success',
                        confirmButtonColor: '#8CD4F5',
                        closeOnConfirm: false
                    }, function () {
                        _successFunction();
                    });
                } else {
                    swal(_errorTitle, response.message ? response.message : "未知错误", "error");
                }
            }).fail(function () {
                _errorFunction();
            });
        }
    };
})(Backend);