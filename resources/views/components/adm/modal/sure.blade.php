@props(['title' => ''])
<div class="modal fade" id="sureModal" tabindex="-1" role="dialog" aria-labelledby="sureModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sureModalTitle">{{__($title)}}</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center text-danger">
                <h3>{{__('adm.are_you_sure')}}</h3>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">{{__('adm.no')}}</button>
                <a class="btn btn-primary" id="sure-submit-link" type="button" href="">{{__('adm.yes')}}</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        $('.sure-btn').on('click', (event) => {
            event.preventDefault();
            let url = event.currentTarget.href;
            console.log(url, event)

            document.querySelector('#sure-submit-link').href = url
        });
    });
</script>