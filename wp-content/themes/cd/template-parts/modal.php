<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
     id="exampleModalCenteredScrollable"
     tabindex="-1"
     aria-labelledby="exampleModalCenteredScrollable"
     aria-modal="true"
     role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-body relative">
                <button class="btn-close box-content w-4 h-4 p-1 ml-auto text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline absolute right-4 top-4"
                        data-bs-dismiss="modal"
                        type="button"
                        aria-label="Close">
                </button>
                <?php get_template_part('/template-parts/form', null, array('is-modal' => true)); ?>
            </div>
        </div>
    </div>
</div>