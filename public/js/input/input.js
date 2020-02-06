$(document).ready(function() {
    $(".nav-item").on("click", function(e) {
    	// alert($(this).attr("href"));
    	// window.location.href = $("#url").val() + $(this).attr("href");
    });

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
});