@props(['editUrl' => '', 'trashUrl' => '', 'restoreUrl' => '', 'removeUrl' => ''])
<div class="dropdown">
    <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        {{__('adm.action')}}
    </a>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

        @if($editUrl)
            <li>
                <a class="dropdown-item" href="{{$editUrl}}">
                    <i class="fa fa-edit"></i>
                    {{__('adm.edit')}}
                </a>
            </li>
        @endif

        @if($trashUrl)
            <li>
                <a class="dropdown-item text-danger" href="{{$trashUrl}}">
                    <i class="fa fa-trash-o"></i>
                    {{__('adm.to_trash')}}
                </a>
            </li>
        @endif

        @if($restoreUrl)
            <li>
                <a class="dropdown-item text-success" href="{{$restoreUrl}}">
                    <i class="fa fa-mail-reply"></i>
                    {{__('adm.restore')}}
                </a>
            </li>
        @endif

        @if($removeUrl)
            <li>
                <a class="dropdown-item text-danger sure-btn" href="{{$removeUrl}}" data-bs-toggle="modal" data-bs-target="#sureModal">
                    <i class="fa fa-times-circle"></i>
                    {{__('adm.remove')}}
                </a>
            </li>
        @endif

    </ul>
</div>
