@extends('layouts.user')

@section('content')

<!-- ====== FAQ Section Start -->
<section x-data="{
                              faqs: [
                                  {
                                      question: 'Qu’est ce que Find ?',
                                      answer: 'Find est une plate-forme destinée à mettre en relation les entreprises et les particuliers demandèrent des services avec des travailleurs indépendants dans différents domaines tels que : Design et graphisme, photographie et tant d’autres . Find propose à ses travailleurs indépendants la possibilité de vendre leurs services aux entreprises et à toute personne désireuse d’un service se trouvant sur la plate-forme',
                                      isOpen: false,
                                  },
                                  {
                                      question: 'Que veut dire le terme Freelance ?',
                                      answer: 'Le mot freelance est une nomenclature anglaise désignant une personne qui travaille pour elle-même sans contrat permanent avec un employeur, et qui est essentiellement son propre patron.',
                                      isOpen: false,
                                  },
                                  {
                                      question: 'La plate-forme est-elle gratuite ?',
                                      answer: 'Oui la plate-forme est gratuite pour ceux qui veulent acheter un service. Pour les Freelance ( vendeurs) , ils doivent souscrire à un pack d’abonnement',
                                      isOpen: false,
                                  },

                                  {
                                      question: 'Comment se fait le paiement pour celui qui commande le service ?',
                                      answer: 'Pour celui qui commande un service, il aura la possibilité de payer par Mobile money local ( M-pesa, Airtel money, Orange money soit par visa et Mastercard.',
                                      isOpen: false,
                                  },
                                  {
                                      question: 'Pourquoi payer avant la livraison du service ?',
                                      answer: 'Il est essentiel d’effectuer un paiement avant la prestation du service pour certifier votre dévouement, ce qui garantit que le freelance ne travaillera pas en vain. De plus, le freelance ne recevra votre argent qu’après réception de votre commande, ce qui garantit la sécurité des deux parties.',
                                      isOpen: false,
                                  },
                                  {
                                      question: 'Comment puis-je signaler un comportement inapproprié sur FIND?',
                                      answer: 'Il est essentiel d’effectuer un paiement avant la prestation du service pour certifier votre dévouement, ce qui garantit que le freelance ne travaillera pas en vain. De plus, le freelance ne recevra votre argent qu’après réception de votre commande, ce qui garantit la sécurité des deux parties.',
                                      isOpen: false,
                                  },
                                  {
                                      question: 'Comment puis-je modifier mes informations de profil sur FIND?',
                                      answer: 'Il est essentiel d’effectuer un paiement avant la prestation du service pour certifier votre dévouement, ce qui garantit que le freelance ne travaillera pas en vain. De plus, le freelance ne recevra votre argent qu’après réception de votre commande, ce qui garantit la sécurité des deux parties.',
                                      isOpen: false,
                                  },
                                  {
                                      question: 'Comment puis-je laisser un avis sur un freelance ou un demandeur de services sur FIND?',
                                      answer: 'Il est essentiel d’effectuer un paiement avant la prestation du service pour certifier votre dévouement, ce qui garantit que le freelance ne travaillera pas en vain. De plus, le freelance ne recevra votre argent qu’après réception de votre commande, ce qui garantit la sécurité des deux parties.',
                                      isOpen: false,
                                  },
                                  {
                                      question: 'Comment puis-je postuler pour un travail en tant que freelance sur FIND?',
                                      answer: 'Il est essentiel d’effectuer un paiement avant la prestation du service pour certifier votre dévouement, ce qui garantit que le freelance ne travaillera pas en vain. De plus, le freelance ne recevra votre argent qu’après réception de votre commande, ce qui garantit la sécurité des deux parties.',
                                      isOpen: false,
                                  },
                                  {
                                      question: 'Est-ce que FIND prend une commission sur les transactions effectuées sur la plateforme?',
                                      answer: 'Il est essentiel d’effectuer un paiement avant la prestation du service pour certifier votre dévouement, ce qui garantit que le freelance ne travaillera pas en vain. De plus, le freelance ne recevra votre argent qu’après réception de votre commande, ce qui garantit la sécurité des deux parties.',
                                      isOpen: false,
                                  },
                              ]
                          }" class="relative z-20 overflow-hidden bg-gray-100 pt-8 pb-12  lg:pb-[90px]">
    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="mx-auto mb-[60px] max-w-[520px] text-center lg:mb-20">
                    <span class="block mb-2 text-lg font-semibold text-primary">
                        FAQ
                    </span>
                    <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px]">
                        Any Questions? Look Here
                    </h2>
                    <p class="text-base text-body-color">
                        There are many variations of passages of Lorem Ipsum available but
                        the majority have suffered alteration in some form.
                    </p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-4">
            <div class="grid w-full gap-4 px-4 md:grid-cols-2">

                <template x-for="(faq, index) in faqs" :key="faq.question">

                    <div
                        class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-4 sm:p-8 lg:px-6 xl:px-8">
                        <button class="flex w-full text-left faq-btn" :class="index !== faqs.length - 1"
                            @click="faqs = faqs.map(f => ({ ...f, isOpen: f.question !== faq.question ? false : !f.isOpen}))">
                            <!-- Specs has it that only one component can be open at a time and also you should be able to toggle the open state of the active component too -->
                            <div
                                class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
                                <svg x-show="!faq.isOpen" class="fill-current" viewBox="0 0 24 24" width="24"
                                    height="24">
                                    <path class="heroicon-ui"
                                        d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm1-9h2a1 1 0 010 2h-2v2a1 1 0 01-2 0v-2H9a1 1 0 010-2h2V9a1 1 0 012 0v2z" />
                                </svg>
                                <svg x-show="faq.isOpen" class="fill-current" viewBox="0 0 24 24" width="24"
                                    height="24">
                                    <path class="heroicon-ui"
                                        d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm4-8a1 1 0 01-1 1H9a1 1 0 010-2h6a1 1 0 011 1z" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 x-text="faq.question" class="text-lg font-semibold text-gray-800">

                                </h4>
                            </div>
                        </button>
                        <div x-show="faq.isOpen" x-collapse class="faq-content pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color" x-text="faq.answer">
                                .
                            </p>
                        </div>
                    </div>

                </template>



            </div>

        </div>
    </div>
    <div class="absolute bottom-0 right-0 z-[-1]">
        <svg width="1440" height="886" viewBox="0 0 1440 886" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.5"
                d="M193.307 -273.321L1480.87 1014.24L1121.85 1373.26C1121.85 1373.26 731.745 983.231 478.513 729.927C225.976 477.317 -165.714 85.6993 -165.714 85.6993L193.307 -273.321Z"
                fill="url(#paint0_linear)" />
            <defs>
                <linearGradient id="paint0_linear" x1="1308.65" y1="1142.58" x2="602.827" y2="-418.681"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#3056D3" stop-opacity="0.36" />
                    <stop offset="1" stop-color="#F5F2FD" stop-opacity="0" />
                    <stop offset="1" stop-color="#F5F2FD" stop-opacity="0.096144" />
                </linearGradient>
            </defs>
        </svg>
    </div>
</section>



<script>


</script>

@endsection
<!-- ====== FAQ Section End -->