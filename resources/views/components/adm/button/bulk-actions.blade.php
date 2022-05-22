@props(['trashUrl' => '', 'restoreUrl' => '', 'removeUrl' => ''])
<div class="dropdown mx-1 bulk-actions" style="display: none">
    <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        {{__('adm.actions')}}
    </a>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

        @if($trashUrl)
            <li>
                <a class="dropdown-item text-danger bulk-action-btn" href="{{$trashUrl}}">
                    <i class="fa fa-trash-o"></i>
                    {{__('adm.to_trash')}}
                </a>
            </li>
        @endif

        @if($restoreUrl)
            <li>
                <a class="dropdown-item text-success bulk-action-btn" href="{{$restoreUrl}}">
                    <i class="fa fa-mail-reply-all"></i>
                    {{__('adm.restore')}}
                </a>
            </li>
        @endif

        @if($removeUrl)
            <li>
                <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#bulkSureModal">
                    <i class="fa fa-trash-o"></i>
                    {{__('adm.remove')}}
                </a>
            </li>
        @endif

    </ul>

    <div class="modal fade" id="bulkSureModal" tabindex="-1" role="dialog" aria-labelledby="bulkSureModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bulkSureModalTitle">{{__('adm.remove_selected_items')}}</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center text-danger">
                    <h3>{{__('adm.are_you_sure')}}</h3>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">{{__('adm.no')}}</button>
                    <a class="btn btn-primary bulk-action-btn" type="button" href="{{$removeUrl}}">{{__('adm.yes')}}</a>
                </div>
            </div>
        </div>
    </div>

    <form action="" class="d-none" id="bulk-form" method="post">
        @csrf
        <input type="hidden" name="ids" id="selected-ids" value="">
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function(){

            let selectedIds = [];

            function tableCheckboxes() {
                if(!document.querySelector('#chk-all')) {
                    return;
                }

                $('#chk-all').click(function () {
                    $('.table-item-check').prop('checked', this.checked);

                    getSelectedIds();

                    if(!this.checked) {
                        $('.bulk-actions').hide();
                    }
                });

                $('.table-item-check').click(function () {
                    if($('.item-for-checking').is(":checked")) {

                        $('.bulk-actions').show();

                        getSelectedIds();

                    } else {
                        $('#chk-all').prop('checked', false);
                        $('.bulk-actions').hide();
                    }
                });
            }

            function getSelectedIds () {
                selectedIds = [];

                $('.item-for-checking:checked').each((key, value) => {
                    let id = value.getAttribute('data-id');
                    selectedIds.push(id)
                })

                $('#selected-ids').val(selectedIds);
            }

            function doAction() {
                $('.bulk-action-btn').on('click', (event) => {
                    event.preventDefault();
                    let url = event.currentTarget.href;

                    let bulkForm = $('#bulk-form');

                    bulkForm.prop('action', url)

                    bulkForm.submit();
                });
            }

            tableCheckboxes();

            doAction();
        });

    </script>
</div>
