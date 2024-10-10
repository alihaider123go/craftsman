<template>
	<div class="accordion accordion-flush" id="FaqAccordion">
		
		<div class="accordion-item" v-for="(faq, index) in faqList" :key="faq.id">
			<h2 class="accordion-header" :id="'heading_'+ faq.id">
				<button class="accordion-button collapsed faq-question" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse_' + faq.id" aria-expanded="false" :aria-controls="'collapse_'+faq.id">
					{{faq.question}}
				</button>
			</h2>
			<div :id="'collapse_'+ faq.id" class="accordion-collapse collapse" :aria-labelledby="'headingOne_'+faq.id" data-bs-parent="#FaqAccordion">
				<div class="accordion-body faq-answer">
					{{faq.answer}}
				</div>
			</div>
		</div>
	</div>
</template>

<script setup>

	import { computed} from 'vue';
	import { onMounted,ref} from 'vue';

	const faqList = ref([]);

	onMounted(async () => {
		faqList.value = [
			{ 
				id: 1,
				question: 'Comment puis-je savoir quel service de bien-être convient le mieux à mes besoins ?',
				answer: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
			},
			{ 
				id: 2,
				question: 'Est-ce que les professionnels  offrent des services adaptés à des groupes spécifiques, tels que les enfants, les personnes âgées ou les personnes ayant des besoins spéciaux ?',
				answer: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
			},
			{ 
				id: 3,
				question: 'Comment puis-je prendre rendez-vous avec un professionnel du bien-être ?',
				answer: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
			},
			{ 
				id: 4,
				question: 'Quelles sont les modalités d\'annulation ou de modification d\'un rendez-vous avec un professionnel du bien-être ?',
				answer: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
			},
			{ 
				id: 5,
				question: 'Est-ce que les professionnels du bien-être sur votre plateforme sont certifiés ou accrédités ?',
				answer: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
			},
		];
	});

</script>