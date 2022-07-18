<li class="icons dropdown" ><a href="javascript:void(0)"  data-toggle="dropdown">
        <i class="mdi mdi-email-outline" id="messageId"></i>
        <span class="badge badge-pill gradient-1">
            <livewire:admin.message.message-counts />
        </span>
    </a>
    <div class="drop-down animated fadeIn dropdown-menu">
        <div class="dropdown-content-heading d-flex justify-content-between">
            <span class=""> All Message </span>
            <a href="javascript:void()" class="d-inline-block">
                <span class="badge badge-pill gradient-1">
                    <livewire:admin.message.message-counts />
                </span>
            </a>
        </div>
        <div class="dropdown-content-body">
            <livewire:admin.message.messages  />
        </div>
    </div>
</li>
