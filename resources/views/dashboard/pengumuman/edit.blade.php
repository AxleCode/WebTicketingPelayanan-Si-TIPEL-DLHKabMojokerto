@extends('dashboard.layouts.main')

@section('container')
<main class="content">
				<div class="container-fluid p-0">
			
					<div class="row">

						<div class="col-12">
							<div class="card">
								
								<div class="card-body">
                                    <p class="fs-3"><strong>Edit Pengumuman</strong></p>
                                    <form action="/dashboard/pengumuman/{{ $pengumuman->id }}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        
                                    <div class="p-1 py-1">
                                        @if(session()->has('successpass'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('successpass') }}
                                        </div>
                                    @endif
                                    @if(session()->has('error'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                        
                                         <!-- Judul Pengumuman -->
                                         <div class=" mb-4 col-lg-8">
                                            <label for="judul">Judul Pengumuman</label>
                                            <input type="text" name="judul" class="mt-2 form-control rounded-top rounded-top @error('judul') is-invalid @enderror" id="judul" placeholder="Judul Pengumuman" required value="{{ old('judul',$pengumuman->judul) }}">
                                            
                                            @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                        
                                        
                        
                                 <!-- Isi Pengumuman -->
                                 <div class="form-outline mb-4 form-floating col-lg-9">
                                    
                                    @error('body')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input id="body" type="hidden" name="body" value="{{ old('body',$pengumuman->body) }}">
                                    
                                    <trix-editor input="body"  
                                        data-trix-allowed-tags="null"
                                    ></trix-editor>

                                 
                                </div>

                                <!-- Status -->
                                <div class=" mb-4  col-lg-9">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option value="1" {{ $pengumuman->status ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ !$pengumuman->status ? 'selected' : '' }}>Nonaktif</option>
                                    
	                               
                                </select>
                            </div>

                                <!-- Submit button -->
                                <div class="mt-2">
                                    <button  id="submit" type="submit" name="submit_type" value="password" class="w-30 btn btn-lg btn-outline-info"><span data-feather="edit" ></span> Edit Pengumuman</button>
                              </div>
                                        
                                    </div>
                                </form>
								</div>
							</div>
						</div>
					</div>
				</div>
                
			</main>
            
            <script>
                document.addEventListener('trix-file-accept', function(e){
                e.preventDefault(); 
            })


            </script>

        


			@endsection
	

	