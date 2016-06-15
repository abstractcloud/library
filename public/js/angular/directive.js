console.log("init directive");
library.directive('fileUpload', function () {
    return {
        scope: true,
        link: function (scope, el, attrs) {
            el.bind('change', function (event) {
                var reader = new FileReader();
                var img = new Image();
                var files = event.target.files[0];
                reader.onload = function () {
                    console.log("reader onload");
                    var dataURL = reader.result;
                    img.src = dataURL;

                    img.onload = function () {
                        $('.img-preview > img').attr('src', img.src);
                    }
                }

                reader.readAsDataURL(files);
                scope.loadfile(files);
                scope.$apply();
            });
        }
    };
});