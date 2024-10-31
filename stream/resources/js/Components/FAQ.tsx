import { useState } from 'react';

{/* ------------------------------------------------------------------- */}
                  {/* ---------------------------TODO Add the link to the support page---------------------------- */}
                  {/* ------------------------------------------------------------------- */}

const FAQ = () => {
    const faqs = [
        { id: '01', question: 'What is StreamVibe?', answer: 'StreamVibe is a streaming service that allows you to watch movies and shows on demand.' },
        { id: '02', question: 'How much does StreamVibe cost?', answer: 'StreamVibe is a streaming service that allows you to watch movies and shows on demand.' },
        { id: '03', question: 'What content is available on StreamVibe?', answer: 'StreamVibe is a streaming service that allows you to watch movies and shows on demand.' },
        { id: '04', question: 'How can I watch StreamVibe?', answer: 'StreamVibe is a streaming service that allows you to watch movies and shows on demand.' },
        { id: '05', question: 'How do I sign up for StreamVibe?', answer: 'StreamVibe is a streaming service that allows you to watch movies and shows on demand.' },
        { id: '06', question: 'What is the StreamVibe free trial?', answer: 'StreamVibe is a streaming service that allows you to watch movies and shows on demand.' },
        // Add more FAQs as needed
    ];

    return (
        <section className="mx-8 my-9">
            <div className="flex flex-col items-center lg:items-start lg:text-start sm:text-center md:text-center">
                <div className="text-white font-bold text-2xl">
                    Frequently Asked Questions
                </div>
                <div className="flex flex-col lg:flex-row lg:justify-between items-center lg:items-start w-full">
                    <div className="text-[#999999] text-sm mt-3 lg:w-1/2 text-center lg:text-left mb-4 lg:mb-0">
                        Got questions? We've got answers! Check out our FAQ section to find answers to the most common questions about StreamVibe.
                    </div>
                    <div className="lg:ml-auto">
                        <button className="bg-[#E50000] p-3 text-white rounded-md">
                            ASK Questions
                        </button>
                    </div>
                </div>
            </div>
            <div className="grid lg:grid-cols-2 mt-12 gap-6">
                {faqs.map((faq) => (
                    <FAQItem key={faq.id} id={faq.id} question={faq.question} answer={faq.answer} />
                ))}
            </div>
        </section>
    );
};

const FAQItem = ({ id, question, answer }: { id: string, question: string, answer: string }) => {
    const [isOpen, setIsOpen] = useState(false);

    return (
        <div className="border-b-2 border-[#E50000] pb-3">
            <div className="flex gap-4 justify-between">
                <div className="flex gap-4">
                    <div className="bg-[#262626] rounded-md p-4 text-white  justify-items-center">
                        {id}
                    </div>
                    <div className="text-white text-lg mt-3">
                        {question}
                    </div>
                </div>
                <button 
                    className="text-white justify-items-end"
                    onClick={() => setIsOpen(!isOpen)}
                >
                    {isOpen ? (
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M5 12h14" />
                        </svg>
                    ) : (
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    )}
                </button>
            </div>
            {isOpen && (
                <div className="text-white text-sm mt-3">
                    {answer}
                </div>
            )}
        </div>
    );
};

export default FAQ;
