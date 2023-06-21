var DatatablesDataSourceHtml= {
    init:function() {
        $("#m_table_1").DataTable( {
            responsive:!0, columnDefs:[ {
                
            }
            ]
        }
        )
    }
}

;
jQuery(document).ready(function() {
    DatatablesDataSourceHtml.init()
}

);