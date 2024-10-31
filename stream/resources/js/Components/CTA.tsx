const CTA = () => {
    return (
        <div>
            <div 
                className="rounded-md bg-black px-20 py-8 lg:block sm:hidden md:hidden" 
                style={{ 
                    backgroundImage: "url('/build/iii/bgf.svg')", 
                    backgroundSize: "cover", 
                    backgroundPosition: "center" 
                }}
            >
                <div className="mt-12 text-center lg:text-left">
                    <div className="text-white text-4xl font-bold">
                        Start your free trial today!
                    </div>
                </div>
                <div className="justify-between mt-8 flex flex-col lg:flex-row items-center lg:items-start">
                    <div className="text-[#999999] text-sm text-center lg:text-left mb-4 lg:mb-0 lg:mr-4">
                        This is a clear and concise call to action that encourages users to sign up for a free trial of StreamVibe.
                    </div>
                    <button className="bg-[#E50000] text-white rounded-md p-3 transition duration-150 ease-in-out hover:scale-105">
                        Start a Free Trial
                    </button>
                </div>
            </div>
        </div>
    );
};

export default CTA;
