<?php $__env->startSection('content'); ?>
    <div class="container mx-auto">
        <div class="max-w-xl mx-auto py-24">
            <h1 class="text-3xl font-extrabold mb-3"><?php echo e(isset($article) ? "Edit" : "Add"); ?> Article</h1>
            <form action="<?php echo e(isset($article) ? route('articles.update', ['article' => $article->id ]) : route('articles.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php if(isset($article)): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <?php if($errors->has('title')): ?>
                        <div class="text-red-500"><?php echo e($errors->first('title')); ?></div>
                    <?php endif; ?>
                    <input type="text" id="title" name="title"
                        value="<?php echo e(isset($article) ? $article->title : ""); ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
                <div class="mb-5">
                    <label for="article"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Article</label>
                    <?php if($errors->has('article')): ?>
                        <div class="text-red-500"><?php echo e($errors->first('article')); ?></div>
                    <?php endif; ?>
                    <textarea class="editor" name="article"><?php echo e(isset($article) ? $article->article : "Hello, World !"); ?></textarea>
                </div>
                <div class="mb-5">
                    <button type="submit"
                        class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Save</button>
                    <a href="<?php echo e(route('articles.index')); ?>">
                        <button type="button"
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Cancel
                            </span>
                        </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/tinymce.js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/laragon/www/laravelwithtailwind-week5/resources/views/article/form.blade.php ENDPATH**/ ?>