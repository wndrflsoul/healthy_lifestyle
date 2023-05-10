$(document).ready(function() {
    // инициализируем таблицу с данными из БД
    $('#table').DataTable({
        ajax: {
            url: "get_data_folder/get_data.php",
            dataSrc: ""
        },
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Поиск...",
            lengthMenu: "Отобразить _MENU_ записей",
            info: "Показаны записи с _START_ по _END_ из _TOTAL_",
            infoEmpty: "Нет записей для отображения",
            infoFiltered: "(filtered from _MAX_ total entries)",
            paginate: {
                first:      "Первый",
                last:       "Последний",
                next:       "Следующий",
                previous:   "Предыдущий"
            }
        },
        columns: [
            { data: "id" },
            { data: "login" },
            { data: "name" },
            { data: "surname" },
            { data: "age" },
            { data: "telephone" },
            { data: "email" },
            { data: "password" },
            { data: "role" }
        ],
        
    });
    $('#table1').DataTable({
        ajax: {
            url: "get_data_folder/get_data_fiz.php",
            dataSrc: ""
        },
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Поиск...",
            lengthMenu: "Отобразить _MENU_ записей",
            info: "Показаны записи с _START_ по _END_ из _TOTAL_",
            infoEmpty: "Нет записей для отображения",
            infoFiltered: "(filtered from _MAX_ total entries)",
            paginate: {
                first:      "Первый",
                last:       "Последний",
                next:       "Следующий",
                previous:   "Предыдущий"
            }
        },
        columns: [
            { data: "id" },
            { data: "user_id" },
            { data: "height" },
            { data: "weight" }
        ],
        
    });
    
});