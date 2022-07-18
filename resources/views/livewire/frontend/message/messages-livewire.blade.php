<div class="col-xs-12 col-sm-7 col-md-7" style="float:right">
    <div class="section-title clear">
        <h3>Send me a meesage</h3>
        <span class="bar-dark"></span>
        <span class="bar-primary"></span>
    </div>

    <form id="contact-form" class="row contact-form no-gutter">
        <div class="col-xs-12 col-sm-6">
            <div class="input-field name">
                <span class="input-icon" id="name"><i class="tf-profile-male"></i></span>
                <input wire:model.deferl="name" type="text" class="form-control" placeholder="Enter your name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div> <!-- ./col- -->
        <div class="col-xs-12 col-sm-6">
            <div class="input-field email">
                <span class="input-icon" id="email"><i class="tf-envelope2"></i></span>
                <input wire:model.defer="email" class="form-control" name="email" placeholder="Your email address">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div> <!-- ./col- -->
        <div class="col-xs-12 col-sm-12">
            <div class="input-field">
                <span class="input-icon" id="subject"><i class="tf-pricetags"></i></span>
                <input wire:model.defer="title" type="text" class="form-control"
                    placeholder="Enter the discussion title">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div> <!-- ./col- -->
        <div class="col-xs-12 col-sm-12">
            <div class="input-field message">
                <span class="input-icon"><i class="tf-pencil2"></i></span>
                <textarea wire:model.defer="message" id="message" class="form-control"
                    placeholder="Write your message"></textarea>
                @error('message')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div> <!-- ./col- -->
        <div class="col-xs-12 col-sm-12">
            <div class="input-field">
                <span class="btn-border">
                    <button wire:click.prevent="store()"
                        class="btn btn-primary btn-custom-border text-uppercase">Send
                        Message now</button>
                </span>
            </div>
            <div class="msg-success">Your Message was sent successfully</div>
            <div class="msg-failed">Something went wrong, please try again later</div>
        </div> <!-- ./col- -->
    </form> <!-- /.row -->

</div> <!-- /.col- -->
