var jMore;
var jSelect;

jQuery(document).ready(function () {
    jMore = $("#more");
    jSelect = $("#type");
    $("#date").datepicker();
    jMore.hide();
    jSelect.change(typeHandler);
}
);
function typeHandler(evt)
{
    var x = $("select option:selected")[0];
    if (x.value === "WaitingFor" || x.value === "Location" || x.value === "TalkTo")
    {
        jMore.show("fast");
    }
    else
    {
        jMore.hide("fast");
        jMore.val("");
    }
}
function addTask(evt)
{
    $.ajax(
            "index.php",
            {
                type: "GET",
                processData: true,
                data: {
                    grp: "Ajax",
                    cmd: "Add",
                    description: $('#desc').val(),
                    datedue: $('#date').val(),
                    type: $('#type').val(),
                    more: $('#more').val()
                },
                //data: "grp=Ajax&cmd=Add&description=" + $('#desc').val() + "&datedue=" + $('#date').val() + "&type=" + $('#type').val() + "&more=" + $('#more').val(),
                dataType: "json",
                success: function (json) {
                    //   alert("SALEH");
                    updateTable(json);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Error: " + jqXHR.responseText);
                    alert("Error: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
}

function delTask(evt)
{
    var allVals = [];
    $('#tasks :checked').each(function () {
        allVals.push($(this).val());
    });
    $.ajax(
            "index.php",
            {
                type: "GET",
                processData: true,
                data: {
                    grp: "Ajax",
                    cmd: "Delete",
                    taskid: allVals,
                },
                dataType: "json",
                success: function (json) {

                    updateTable(json);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Error: " + jqXHR.responseText);
                    alert("Error: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
}


function updateTable(tlist) {
    $('#desc').val("");
    $('#date').val("");
    $('#more').val("");
    $('#tableList tbody').empty();
    for (var key in tlist) {
        var tmp = $("<tr><td><input type=\'checkbox\' name= \'taskid[]\' value=" + tlist[key].id + "</td><td>" + tlist[key].description + "</td><td>" + tlist[key].type + "</td><td>" + tlist[key].datedue + "</td></tr>");
        $('#tableList tbody').append(tmp);
    }
}