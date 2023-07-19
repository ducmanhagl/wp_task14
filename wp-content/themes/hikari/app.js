function handleNameToFuriName() {
    $.fn.autoKana("#name", "#name-furi", {
        katakana: true, //true：カタカナ、false：ひらがな（デフォルト）
    });
}

function handleShowFileName() {
    var fileCV = $("#cv-file");
    var fileAvatar = $("#avatar-file");

    if ($("#file-name-cv").text()) {
        $("#cv-label").text("ファイル指定済み");
    }

    if ($("#file-name-avatar").text()) {
        $("#avatar-label").text("ファイル指定済み");
    }

    fileCV.on("change", function (e) {
        var name = this.files[0].name;
        if (name) {
            $("#cv-label").text("ファイル指定済み");
            $("#file-name-cv").text(name);
        }
    });

    fileAvatar.on("change", function () {
        var name = this.files[0].name;
        if (name) {
            $("#avatar-label").text("ファイル指定済み");
            $("#file-name-avatar").text(name);
        }
    });
}

function validateForm() {
    $.validator.addMethod("valid_email", function (value) {
        var regex =
            /^[a-z0-9]+([-._][a-z0-9]+)*@([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{1,5}$/;
        return value.trim().match(regex);
    });

    var form = $("#send-mail-form");
    form.validate({
        rules: {
            name: {
                required: true,
            },

            "name-furi": {
                required: true,
            },
            email: {
                required: true,
                email: true,
                valid_email: true,
            },
            tel: {
                digits: true,

                minlength: 10,
                maxlength: 11,
            },

            "cv-file": {
                extension: "jpg|jpeg|pdf|doc|docx|png|xls|csv",
            },
            "avatar-file": {
                extension: "jpeg|jpg|png",
            },
        },
        messages: {
            name: {
                required: "『氏名』を入力してください。",
            },

            "name-furi": {
                required: "『氏名』を入力してください。",
            },
            email: {
                required: "『氏名』を入力してください。",
                email: "無効なメールです!",
                valid_email: "無効なメールです!",
            },
            tel: {
                required: "『電話番号』を入力してください。",
                minlength: "無効な電話番号!",
                maxlength: "無効な電話番号!",
                digits: "無効な電話番号!",
            },
            "cv-file": {
                extension: "※pdf,excel,word,jpg,pngのみ",
            },
            "avatar-file": {
                extension: "※jpg,pngのみ",
            },
        },
    });

    $("#name-furi").on("change", function () {
        form.valid();
    });
}

function app() {
    $(document).ready(function () {
        handleNameToFuriName();
        validateForm();
        handleShowFileName();
    });
}

app();
