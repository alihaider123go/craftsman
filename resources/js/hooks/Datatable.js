import { onMounted, onBeforeUnmount,ref } from 'vue';
import $ from 'jquery';
import 'datatables.net-bs5/css/dataTables.bootstrap5.min.css';
import 'datatables.net-bs5';

const useDataTable = ({ tableRef, columns, custom_grid, data = [], url = null, actionCallback, per_page=12, advanceFilter = undefined, dom = '<"row align-items-center"<"col-md-6" l><"col-md-6" f>><"table-responsive my-3" rt><"row align-items-center" <"col-md-6" i><"col-md-6" p>><"clear">' }) => {
    const totalRecords = ref(0); // Reactive property to hold total records count

  onMounted(() => {
    setTimeout(() => {
      let datatableObj = {
        dom: dom,
        autoWidth: false,
        columns: columns,
        initComplete: function () {
          $(tableRef.value).find('tbody').addClass(custom_grid ? custom_grid : 'row row-cols-xl-4 row-cols-lg-3 row-cols-sm-2')
        }
      };

      if (url) {
        datatableObj = {
          ...datatableObj,
          processing: true,
          serverSide: true,
          pageLength: per_page,
          ajax: {
            url: url,
            data: function(d) {
                if(typeof advanceFilter == 'function' && advanceFilter() !== undefined) {
                    d.filter = {...d.filter, ...advanceFilter()}
                }
            },
            dataFilter: function(data) {
              const json = JSON.parse(data);
              totalRecords.value = json.recordsTotal; // Update total records count
              return data;
            }
          },
            initComplete: function () {
              $(tableRef.value).find('tbody').addClass(custom_grid ? custom_grid : 'row row-cols-xl-4 row-cols-lg-3 row-cols-sm-2')
              totalRecords.value = $(tableRef.value).DataTable().page.info().recordsTotal; // Update total records count
          }
        };
      }

      if (data) {
        datatableObj = {
          ...datatableObj,
          data: data,
        };
      }

      let datatable = $(tableRef.value).DataTable(datatableObj);

      if (typeof actionCallback === 'function') {
        $(datatable.table().body()).on('click', '[data-table="action"]', function () {
          actionCallback({
            id: $(this).data('id'),
            method: $(this).data('method'),
          });
        });
      }
    }, 0);
  });

  onBeforeUnmount(() => {
    if ($.fn.DataTable.isDataTable(tableRef.value)) {
      $(tableRef.value).DataTable().destroy();
    }

    $(tableRef.value).empty();
  });

   return { totalRecords }; 
};

export default useDataTable;
