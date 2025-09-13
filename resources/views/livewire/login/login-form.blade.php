<div>
    <div class="container" style="padding-top: 10%;">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <h2 class="text-center mb-4">Sig-In</h4>
                    <x-alert />
                    <div class="card">
                    <div class="card-body border-top border-5 rounded border-dark-subtle">
                        <form wire:submit.prevent="login">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" wire:model="username" class="form-control @error('username') is-invalid @enderror">
                                @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <div class="d-grid my-4">
                                    <button type="submit" class="btn btn-secondary">
                                        Sign-In
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
