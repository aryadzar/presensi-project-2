@extends('dashboard_pegawai.dashboard-layout.index')

@section('title', 'Isi Logbook Hari Ini ')
@section('nama_pegawai', 'Jauhari')
@section('role', 'Pegawai')
@section('content')

    <script src="{{ asset('assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>

    <div class="mb-3">
        <h1 class="text-2xl font-semibold"><i class="fa-solid fa-book text-blue-500 mr-2 dark:text-white"></i> <span
                class="dark:text-white text-blue-500">Isi Log Book</span></h1>
    </div>

    <!-- Attendance Table -->
    <div class="bg-blue-100 dark:bg-slate-500 p-6 grid grid-cols-1 lg:grid-cols-2 mt-5 rounded-sm">
        <!-- Table -->
        <div class="col-span-3">
            <form action="{{ route('presensi.store_logbook', $id->id) }}" method="post">
                @csrf
                <div class="form-control text-black-2 ">
                    <label for="tanggal" class="mb-5">Tanggal Presensi :  </label>
                    <input type="datetime-local" class="bg-white text-black-2 rounded-md" id="tanggal" value="{{ $id->created_at }}" disabled>
                </div>
                <div class="form-control text-black-2 mt-7">
                    <label for="tanggal" class="mb-5">Status Isi :  </label>
                    @if (is_null($id->isi_logbook))

                    <input type="text" class="bg-red-500 text-black-2 rounded-md"  id="" value="Belum Mengisi" disabled>
                    @else

                    <input type="text" class="bg-green-500 text-black-2 rounded-md"  id="" value="Sudah Mengisi" disabled>
                    @endif
                </div>
                <div class="form-control text-black-2 mt-5">
                    <label for="tanggal" class="mb-5">Isi Logbook Anda Di sini :  </label>
                    @if (is_null($id->isi_logbook))

                    <textarea class="bg-white text-black-2 rounded-md tinymce" name="isi_logbook" id="tanggal" >

                    </textarea>
                    @else

                    <div class="">
                        {!! $id->isi_logbook !!}
                    </div>

                    @endif

                </div>
                <div class="flex justify-end mt-5">
                    @if (is_null($id->isi_logbook))

                    <button type="submit" onclick="return confirm('Anda yakin ingin menyimpan isi logbook ? Isi logbook tidak akan dapat dirubah')" class="btn btn-success bg-blue-600 hover:bg-blue-700">Submit</button>

                    @else

                    <button class="btn btn-success bg-blue-600 hover:bg-blue-700" disabled>Submit</button>

                    @endif
                </div>
            </form>
        </div>
    </div>
    <script>
        tinymce.init({
          selector: '.tinymce',
          plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
          toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
          mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
          ],
          ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
          setup: function (editor) {
                          editor.on('change', function () {
                              editor.save();
                          });
                      }

        });
     </script>

@endsection
