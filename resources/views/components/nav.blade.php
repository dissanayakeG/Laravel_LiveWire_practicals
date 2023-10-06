<div class="nav-list">
    <ul>
        @auth
            <li class="item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                        <span class="text">{{ 'Log Out' }}</span>
                    </a>
                </form>
            </li>

            <li class="item">
                <a href="/dashboard" wire:navigate>
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                    <span class="text">{{ 'DASHBOARD' }}</span>
                </a>
            </li>
            <li class="item">
                <a href="/livewire" wire:navigate>
                    <span class="text">{{ 'LIVEWIRE' }}</span>
                </a>
            </li>
            <li class="item">
                <a href="/form" wire:navigate>
                    <span class="text">{{ 'FORM SUBMISSION' }}</span>
                </a>
            </li>
            <li class="item">
                <a href="/events" wire:navigate>
                    <span class="text">{{ 'EVENTS' }}</span>
                </a>
            </li>
            <li class="item">
                <a href="/blade-tests" wire:navigate>
                    <span class="text">{{ 'BLADES' }}</span>
                </a>
            </li>
            <li class="item">
                <a href="/facades" wire:navigate>
                    <span class="text">{{ 'FACADES' }}</span>
                </a>
            </li>
        @else
            <li class="item">
                <a href="/register" wire:navigate>
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                    <span class="text">{{ 'REGISTER' }}</span>
                </a>
            </li>
            <li class="item">
                <a href="/login" wire:navigate>
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                    <span class="text">{{ 'LOGIN' }}</span>
                </a>
            </li>
        @endauth
    </ul>
</div>
