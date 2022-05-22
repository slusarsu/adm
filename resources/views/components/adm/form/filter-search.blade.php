<form method="get" class="adm-form-filter">
    <div class="faq-form">
        <div class="d-flex">
            <div class="mx-1">
                <select class="form-select digits" id="itemsPerPage" name="itemsPerPage">
                    <option value="10" @if(request('itemsPerPage') == 10) selected @endif>10</option>
                    <option value="20" @if(request('itemsPerPage') == 20) selected @endif>20</option>
                    <option value="50" @if(request('itemsPerPage') == 50) selected @endif>50</option>
                    <option value="100" @if(request('itemsPerPage') == 100) selected @endif>100</option>
                </select>
            </div>
            <div class="mx-1">
                <input class="form-control" type="text" name="search" placeholder="Search.." value="{{ request('search') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search search-icon">
                    <circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
        </div>

        <input type="hidden" name="filter" id="admFormFilter" value="{{ request('filter') }}">
        <input type="hidden" name="order" id="admFormOrder" value="{{ request('order') }}">
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        admSortable();

        function admSortable() {

            let form = document.querySelector('.adm-form-filter');
            let url = new URL(window.location.href);
            let urlParams = url.searchParams;
            let filter = urlParams.has('filter') ? urlParams.get('filter') : '';
            let order = urlParams.has('order') ? urlParams.get('order') : '';

            if(document.querySelector('.adm-sortable')) {
                document.querySelectorAll('.adm-sortable').forEach( el => {
                    el.addEventListener('click', event => {
                        let name = event.target.getAttribute("data-name");
                        document.querySelector('input#admFormFilter').value = name;

                        let itemOrder = 'asc'

                        if(filter == name) {
                            itemOrder = order == 'asc' ? 'desc' : 'asc';
                        } else {
                            itemOrder = 'asc'
                        }

                        document.querySelector('input#admFormOrder').value = itemOrder;

                        form.submit();
                    });
                });

                $('#itemsPerPage').on('change', (event) => {
                    form.submit();
                })
            }
        }

    });
</script>