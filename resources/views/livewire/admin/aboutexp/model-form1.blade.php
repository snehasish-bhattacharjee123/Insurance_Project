<div wire:ignore.self class="modal fade" id="AddAbout" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Admin About</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="resetField()"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store()">
                    <div class="col-md-8 my-2">
                        <label class="form-label">About Experience</label>
                        <input type="number" class="form-control" wire:model="about_experience">
                        @error('about_experience')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-8 my-4">
                        <label class="form-label">About Image</label>
                        <input type="file" class="form-control" wire:model="about_image">
                        @error('about_image')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 my-4">
                        <label class="form-label">About Contac</label>
                        <input type="number" class="form-control" wire:model="about_contact"
                            oninput="this.value = this.value.slice(0,10)">
                        @error('about_contact')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="col-md-12 mt-3">
                        <label class="form-label my-3">Status</label>
                        <input type="checkbox" class="form-check-input form-control" wire:model="status">
                    </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    wire:click="resetField()">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>



<!-- edit section -->

<div wire:ignore.self class="modal fade" id="editExp" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Admin About</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="resetField()"
                    aria-label="Close"></button>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <div wire:loading class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <div wire:loading.remove class="modal-body">

                <form wire:submit.prevent="update()">
                    <div class="col-md-8 my-2">
                        <label class="form-label">About Experience</label>
                        <input type="number" class="form-control" wire:model="about_experience" value="{{'about_experience'}}">
                        @error('about_experience')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-8 my-4">
                        <label class="form-label">About Image</label>
                        <input type="file" class="form-control" wire:model="about_image">

                        @if (!empty($about_image))
                            <img src="{{ asset('/storage/about/' . $about_image) }}" alt="Experience image "
                                class="img-fluid mt-2" style="height: 100px; width: 100px; background-size: cover">
                        @endif

                        @error('about_image')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 my-4">
                        <label class="form-label">About Contac</label>
                        <input type="number" class="form-control" wire:model="about_contact"
                            >
                        @error('about_contact')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="col-md-12 mt-3">
                        <label class="form-label my-3">Status</label>
                        <input type="checkbox" class="form-check-input form-control" wire:model="status">
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    wire:click="resetField()">Close</button>
                <button type="submit" class="btn btn-warning">Update Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
