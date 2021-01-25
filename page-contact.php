<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores_tailwind
 */

get_header();
?>

<main id="primary" class="site-main w-full max-w-3xl mx-auto px-5 flex-1">

	<?php
while (have_posts()):
    the_post();

    get_template_part('template-parts/content', 'page');

    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()):
        comments_template();
    endif;

endwhile; // End of the loop.
?>
	<div>
	<style>
		button:disabled {
		cursor: not-allowed;
		opacity: 0.5;
		}
	</style>
		<form action="#" method="POST" x-data="contactForm()" x-on:submit.prevent="submitData">
			<div class="sm:overflow-hidden">
				<div class="py-5 bg-white space-y-6 sm:py-6">
					<div class="grid grid-cols-3 gap-6">
						<div class="col-span-3">
							<label for="name" class="block text-sm font-bold text-gray-700">
								Your Name
							</label>
							<div class="mt-1 flex rounded-md shadow-sm">
								<input type="text" name="name" id="name"
									class="focus:ring-green-500 focus:border-green-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
									placeholder="John Doe"
									x-model="formData.name"
									data-rules='["required"]'>
							</div>
						</div>
						<div class="col-span-3">
							<label for="contact_email" class="block text-sm font-bold text-gray-700">
								Contact Email
							</label>
							<div class="mt-1 flex rounded-md shadow-sm">
								<span
									class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
									&#64;
								</span>
								<input type="email" name="contact_email" id="contact_email"
									class="focus:ring-green-500 focus:border-green-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
									placeholder="johndoe@doesite.com"
									x-model="formData.email"
									data-rules='["required","email"]'>
							</div>
						</div>
						<div class="col-span-3">
							<label for="message" class="block text-sm font-bold text-gray-700">
								Message
							</label>
							<div class="mt-1">
								<textarea id="message" name="message" rows="3"
									class="shadow-sm focus:ring-green-500 focus:border-green-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
									placeholder="you@example.com"
									x-model="formData.message"
									data-rules='["required"]'></textarea>
							</div>
		
						</div>
						<div class="col-start-3 text-right">
							<button class="bg-green-400 hover:bg-green-500 disabled:opacity-50 text-white border border-transparent shadow-sm text-sm font-bold rounded-md py-2 px-4 w-full" x-text="buttonLabel" :disabled="loading"></button>
						<p x-text="message"></p>
						</div>
					</div>
				</div>
			</div>
	</div>
	</form>
	</div>
</main><!-- #main -->
<script src="https://cdn.jsdelivr.net/gh/mattkingshott/iodine@3/dist/iodine.min.js"></script>

<script>
    function contactForm() {
      return {
        formData: {
          name: '',
          email: '',
          message: ''
		},
		message: '',
		loading: false,
		buttonLabel: 'Send',
		formError: false,
        
		submitData() {
			
			this.message = ''
			let inputs = [...this.$el.querySelectorAll("input[data-rules]")];
			inputs.map((input) => {
				if (Iodine.is(input.value, JSON.parse(input.dataset.rules)) !== true) {
				this.message = 'Please check your input'
				console.log('invalid inputs')
				this.formError = true
				}
				else {
					this.formError = false
				}
			});

			if (!this.formError) {

				this.buttonLabel = 'Sending'
				this.loading = true;

				fetch('https://fwjcjg6za6.execute-api.us-east-1.amazonaws.com/prod/contact', {
				method: 'POST',
				headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(this.formData)
				})
				.then(() => {
					this.message = 'Form sucessfully submitted!'
				})
				.catch(() => {
					this.message = 'Ooops! Something went wrong!'
				})
				.finally(() => {
					this.loading = false;
					this.buttonLabel = 'Send'
				})
				}

			
		}
      }
    }
</script>
<?php
// get_sidebar();
get_footer();