<div class="d-grid bg-white rounded-4 shadow-lg w-20rem m-3 animate-05 hover-size-001">
    <div class="w-100 p-2 d-flex flex justify-content-between text-white rounded-4" style="background-color: #006efd">
        <span class="fw-bold fs-6 ">
            Vodíková technologie
        </span>
        <span class="text-end" data-title="Doprava">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-tree-fill"
                 viewBox="0 0 16 16">
              <path
                  d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5z"/>
            </svg>
        </span>
    </div>

    <div class="p-3">
        <div class="mb-2">
            <span >
                <img class="w-100 mb-3" src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/hydrogen-cars-1598551533.jpg">
            </span>
            <span class="fw-bold fs-4 cr-blue mt-3">
                1) Dotace na automobily
            </span>
        </div>

        <div class="bg-light rounded-2 p-2 w-100">
            <div>
            <span>
                Ekonomie:
            </span>
                <span class="text-green fw-bold">
                 +1
            </span>
            </div>
            <div>
            <span>
                Skleníkové plyny:
            </span>
                <span class="text-red fw-bold">
                 -1
            </span>
            </div>

        </div>
        <div class=" fs-3 text-end mt-3 mb-1 d-flex flex justify-content-between">
            <div class="d-flex flex justify-content-between w-50">
                <div class="d-grid text-center">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                          <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                        </svg>
                    </span>
                    <span class="fw-bold fs-5">
    {{--                    Počet států kteří mají technologii nakoupenou--}}
                        1
                    </span>

                </div>

                <div class="d-grid text-center">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                          <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                        </svg>
                    </span>
                    <span class="fw-bold fs-5">
                        {{--                    Počet států kteří mají technologii dokončenou--}}
                        0
                    </span>

                </div>
            </div>
            <div>
                <span class="fs-5">
                    Cena:
                </span>
                    <span class="fw-bold">
                    5M
                </span>
            </div>
        </div>
        <div class="w-100">
            <button type="button" class="btn btn-primary w-100">KOUPIT</button>
        </div>

        @if(Auth::permition()->admin ==1)
        <div class="bg-light rounded-4">
            <div class="w-100 text-center p-1 animate-05 hover-size-01  mt-2 cursor-pointer " onclick="showAndHideElement(this.parentNode,'setting')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down animate-05 hover-size-01 show" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-up hide" viewBox="0 0 16 16" hidden="">
                    <path fill-rule="evenodd" d="M7.776 5.553a.5.5 0 0 1 .448 0l6 3a.5.5 0 1 1-.448.894L8 6.56 2.224 9.447a.5.5 0 1 1-.448-.894l6-3z"/>
                </svg>
            </div>
            <div class="setting p-2" hidden>
                <div>
                    <span class="fw-bold me-4">
                        Viditelné:
                    </span>
                    <span>
                        <input type="checkbox" class="fs-3" checked>
                    </span>
                </div>
                <div>
                    <span class="fw-bold me-4">
                        Certifikace:
                    </span>
                    <span>
                        <input type="checkbox" class="fs-3" checked>
                    </span>
                </div>
                <div>
                    <span class="fw-bold me-4">
                        Kolo:
                    </span>
                    <span>
                        <input type="number" min="0" value="0" required>
                    </span>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
