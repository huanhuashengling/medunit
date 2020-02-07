$(document).ready(function() {

    $('#patientBirthday').datetimepicker({
    	format: 'L'
    });

    $('#admissionDate').datetimepicker({
    	format: 'L'
    });

    $('#checkDate').datetimepicker({
    	format: 'L'
    });

    $('#outAdmissionDate').datetimepicker({
    	format: 'L'
    });

    $('#ccTime').datetimepicker({
    	format: 'L'
    });

    $('#digestiveSymptom2').on("click", function(e) {
        if ($('#digestiveSymptom2').hasClass("active")) {
            $("#vomitExpand").addClass("d-none");
        } else {
            $("#vomitExpand").removeClass("d-none");
        }
    });

    $('#digestiveSymptom3').on("click", function(e) {
        if ($('#digestiveSymptom3').hasClass("active")) {
            $("#abdominalPainExpand").addClass("d-none");
        } else {
            $("#abdominalPainExpand").removeClass("d-none");
        }
    });

    $('#digestiveSymptom4').on("click", function(e) {
        if ($('#digestiveSymptom4').hasClass("active")) {
            $("#stoolExpand").addClass("d-none");
        } else {
            $("#stoolExpand").removeClass("d-none");
        }
    });

    $('#skinSoftTissue0').on("click", function(e) {
        if ($('#skinSoftTissue0').hasClass("active")) {
            $("#erythraExpand").addClass("d-none");
        } else {
            $("#erythraExpand").removeClass("d-none");
        }
    });

    $('#nervousSystem0').on("click", function(e) {
        if ($('#nervousSystem0').hasClass("active")) {
            $("#headacheExpand").addClass("d-none");
        } else {
            $("#headacheExpand").removeClass("d-none");
        }
    });
});