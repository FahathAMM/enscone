<div>
    <div class="preview-wrapper">
        <div class="switcher-head">
            <span>Style Switcher</span>
            <div class="switcher-trigger tf-tools"></div>
         </div>

        <div class="switcher-body">
            <h4 style="color:black">Choose Color:</h4>
            <ul class="color-options list-none">
                <li class="c0" data-color="red" wire:click="changeTheme('red')" title="Default">Default</li>
                <li class="c1" data-color="blue" wire:click="changeTheme('blue')" title="Red">Red</li>
                <li class="c2" data-color="green" wire:click="changeTheme('green')" title="Green">Green</li>
                <li class="c3" data-color="yellow" wire:click="changeTheme('yellow')" title="Blue">Blue</li>
            </ul>
        </div>
    </div>
</div>
