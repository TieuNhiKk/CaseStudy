let product = {} || product;

product.showDrugs = () => {
    $.ajax({
        url: "http://localhost:3000/Drugs",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $("#showDrugs").empty();
            let i = 0;
            $.each(data, (i, v) => {
                $("#showDrugs").append(
                    `<tr>
                        <td class="text-center">${i + 1}</td>
                        <td>${v.Name}</td>
                        <td>${v.Dose}</td>
                        <td>${v.Unit.unit}</td>
                        <td class="text-center">${v.WareHouse.wh}</td>
                        <td>${v.Type.type}</td>
                        <td>${v.Origin}</td>
                        <td>${v.Buy}</td>
                        <td>${v.Sell}</td>
                        <td>${v.Amounts}</td>
                        <td>${v.ExpryDate}</td>
                        <td>${v.Status.stt}</td>
                        <td>
                            <a href="javascript:void(0)" title="Edit Drug" class="btn btn-warning" onclick="product.edit(${v.id})"><i class="fa fa-pencil-square-o"></i></a>
                            <a href="javascript:void(0)" title="Delete Drug" class="btn btn-danger" onclick="product.delete(${v.id})"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>`
                );
            });
        }
    });
}

product.openModal = () => {
    product.reset();
    $('#addEditdrug').modal('show');
};

product.save = () => {
    if ($("#formAddEditdrug").valid()) {
        if ($("#id").val() == 0) {
            let newDrug = {};
            newDrug.Name = $("#getName").val();
            newDrug.Dose = $("#getDose").val();
            newDrug.Origin = $("#getOrigin").val();
            newDrug.Buy = $("#getBuy").val();
            newDrug.Sell = $("#getSell").val();
            newDrug.Amounts = $("#getAmount").val();
            newDrug.ExpryDate = $("#getEXP").val();

            let whObj = {};
            whObj.id = $("#getWare").val();
            whObj.wh = $("#getWare option:selected").html();
            newDrug.WareHouse = whObj;

            let typeObj = {};
            typeObj.id = $("#getType").val();
            typeObj.type = $("#getType option:selected").html();
            newDrug.Type = typeObj;

            let sttObj = {};
            sttObj.id = 1;
            sttObj.stt = $("#getStatus option:selected").html();;
            newDrug.Status = sttObj;

            let unitObj = {};
            unitObj.id = $("#getUnit").val();;
            unitObj.unit = $("#getUnit option:selected").html();
            newDrug.Unit = unitObj;

            $.ajax({
                url: "http://localhost:3000/Drugs",
                method: "POST",
                dataType: "json",
                contentType: "application/json",
                data: JSON.stringify(newDrug),
                success: function (data) {
                    $("#addEditDrug").modal("hide");
                    product.showDrugs();
                }
            });
        }
        else {
            let update = {};
            update.id = $("#id").val();
            update.Name = $("#getName").val();
            update.Dose = $("#getDose").val();
            update.Origin = $("#getOrigin").val();
            update.Buy = $("#getBuy").val();
            update.Sell = $("#getSell").val();
            update.Amounts = $("#getAmount").val();
            update.ExpryDate = $("#getEXP").val();

            let whObj = {};
            whObj.id = $("#getWare").val();
            whObj.wh = $("#getWare option:selected").html();
            update.WareHouse = whObj;

            let typeObj = {};
            typeObj.id = $("#getType").val();
            typeObj.type = $("#getType option:selected").html();
            update.Type = typeObj;

            let sttObj = {};
            sttObj.id = $("#getStatus").val();;
            sttObj.stt = $("#getStatus option:selected").html();
            update.Status = sttObj;

            let unitObj = {};
            unitObj.id = $("#getUnit").val();;
            unitObj.unit = $("#getUnit option:selected").html();
            update.Unit = unitObj;

            $.ajax({
                url: "http://localhost:3000/Drugs/" + update.id,
                method: "PUT",
                dataType: "json",
                contentType: "application/json",
                data: JSON.stringify(update),
                success: function (data) {
                    $('#addEditDrug').modal('hide');
                    product.drawTable();
                }
            });
        }
    }
}

product.delete = (id) => {
    bootbox.confirm({
        title: "Remove Drug",
        message: "Do you want to remove this Drug?",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Cancel'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Confirm'
            }
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    url: "http://localhost:3000/Drugs/" + id,
                    method: "DELETE",
                    dataType: "json",
                    success: function (data) {
                        product.showDrugs();
                    }
                });
            }
        }
    });
};

product.edit = (id) => {
    $.ajax({
        url: "http://localhost:3000/Drugs/" + id,
        method: "GET",
        dataType: "json",
        success: function (data) {
            $("#setStatus").removeAttr("hidden");
            $("#update").text("Update");
            $('#getName').val(data.Name);
            $("#getDose").val(data.Dose);
            $("#getUnit").val(data.Unit.id);
            $('#getWare').val(data.WareHouse.id);
            $('#getType').val(data.Type.id);
            $('#getOrigin').val(data.Origin);
            $('#getBuy').val(data.Buy);
            $('#getSell').val(data.Sell);
            $("#getAmount").val(data.Amounts);
            $('#getEXP').val(data.ExpryDate);
            $("#getStatus").val(data.Status.id);
            $('#id').val(data.id);
            let validator = $("#formAddEditdrug").validate();
            validator.resetForm();
            $('#addEditdrug').modal('show');

        }
    });
};

product.reset = () => {
    $("#setStatus").attr("hidden", "true");
    $("#update").text("Add Drug");
    $('#getName').val("");
    $("#getDose").val("");
    $("#getUnit").val(1);
    $('#getWare').val(1);
    $('#getType').val(1);
    $('#getOrigin').val("");
    $('#getBuy').val("");
    $('#getSell').val("");
    $("#getAmount").val("");
    $('#getEXP').val("2020-01-20");
    $("#getStatus").val(1);
    $('#id').val(0);
    let validator = $("#formAddEditdrug").validate();
    validator.resetForm();
}

product.wareHouse = () => {
    $.ajax({
        url: "http://localhost:3000/WareHouses",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $("#getWare").empty();
            $.each(data, function (i, v) {
                $("#getWare").append(
                    `<option value="${v.id}">${v.wh}</option>`
                );
            });
        }
    });
}

product.type = () => {
    $.ajax({
        url: "http://localhost:3000/Types",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $("#getType").empty();
            $.each(data, function (i, v) {
                $("#getType").append(
                    `<option value="${v.id}">${v.type}</option>`
                );
            });
        }
    });
}

product.status = () => {
    $.ajax({
        url: "http://localhost:3000/Status",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $("#getStatus").empty();
            $.each(data, function (i, v) {
                $("#getStatus").append(
                    `<option value="${v.id}">${v.stt}</option>`
                );
            });
        }
    });
}

product.unit = () => {
    $.ajax({
        url: "http://localhost:3000/Units",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $("#getUnit").empty();
            $.each(data, function (i, v) {
                $("#getUnit").append(
                    `<option value="${v.id}">${v.unit}</option>`
                );
            });
        }
    });
}

product.search = () => {
    $("#searchName").on("keyup", function () {
        let value = $(this).val().toLowerCase();
        $("#showDrugs tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
}

product.init = () => {
    product.showDrugs();
    product.wareHouse();
    product.status();
    product.type();
    product.unit();
    product.search();
}

$(document).ready(function () {
    product.init();
});