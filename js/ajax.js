jQuery(document).ready(function($) {
    $('#subjectSelect').change(function() {
        let subject_id = $(this).val();
        let dataObj    = {
            'action' : 'get_teacher',
            'subject_id'  : subject_id
        }
        $.ajax({
            url         : ajaxurl, 
            type        : 'POST',
            data        : dataObj,
            dataType    : 'json',
            success: function(response) {
                if (response.success) {
                    let teachers = response.data.teachers;
                    let teacherSelect = $('#teacherSelect');

                    teacherSelect.empty();

                    $.each(teachers, function(index, teacher) {
                        teacherSelect.append($('<option>', {
                            value: teacher.id,
                            text: teacher.name
                        }));
                    });
                } else {
                    console.log('Không thể lấy dữ liệu giáo viên.');
                }
            }
        
        });
    });
});