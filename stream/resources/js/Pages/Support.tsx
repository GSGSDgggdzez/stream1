
import { usePage } from '@inertiajs/react';
import Checkbox from '@/Components/Checkbox';
import { PageProps } from '@/types';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Textarea } from "@/Components/ui/textarea"
import FAQ from '@/Components/FAQ';
import Footer from '@/Components/Footer';
import CTA from '@/Components/CTA';
import { Head, Link, useForm } from '@inertiajs/react';
import Main from '@/Layouts/Main';
import { FormEventHandler } from 'react';
import Navbar from '@/Components/Navbar';



export default function Support() {

    const { auth } = usePage<PageProps>().props;
    const { selectedProfile } = auth;

    const { data, setData, post, processing, errors, reset } = useForm({
        First_name: '',
        email: '',
        Last_name: '',
        message: '',
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('send.support.email'), {
            onSuccess: () => {
                reset('First_name', 'Last_name', 'email', 'message');
            },
        });
    };

    return (
        <Main>
            <div className='pt-4'>
            <Navbar/>
            </div>
            {/* These is the contact form  */}
            <div className='mt-12 px-10'>
                <div className='grid lg:grid-cols-3 gap-10'>
                    <div className='col-span-1'>
                        <div className='font-bold text-4xl text-white mb-4'>
                            Welcome to our support page!
                        </div>
                        <div className='text-[#999999] text-sm' >
                            We're here to help you with any problems you may be having with our product.
                        </div>
                        <div className='mt-2'>
                            <img src="/build/iii/Sub.svg" alt="" />
                        </div>
                    </div>
                    <div className='col-span-2'>
                        <div className='bg-[#0F0F0F] p-8 rounded-lg border-white border-1'>
                            <form onSubmit={submit}>
                                <div className='grid grid-cols-2 gap-10'>
                                    {/* ------------------------------------------------------------------- */}
                                    {/* ---------------------------TODO Fix the sending email Errors---------------------------- */}
                                    {/* ------------------------------------------------------------------- */}
                                    {/* these is the First Name */}
                                    <div>
                                        <InputLabel htmlFor="First_name" value="First Name" className='text-white' />

                                        <TextInput
                                            id="First_name"
                                            name="First_name"
                                            value={data.First_name}
                                            className="mt-1 block w-full bg-transparent text-white"
                                            autoComplete="First_name"
                                            isFocused={true}
                                            onChange={(e) => setData('First_name', e.target.value)}
                                            required
                                        />

                                        <InputError message={errors.First_name} className="mt-2" />
                                    </div>

                                    {/* these is the Last Name */}
                                    <div>
                                        <InputLabel htmlFor="Last_name" value="Last Name" className='text-white' />

                                        <TextInput
                                            id="Last_name"
                                            name="Last_name"
                                            value={data.Last_name}
                                            className="mt-1 block w-full bg-transparent text-white"
                                            autoComplete="Last_name"
                                            isFocused={true}
                                            onChange={(e) => setData('Last_name', e.target.value)}
                                            required
                                        />

                                        <InputError message={errors.Last_name} className="mt-2" />
                                    </div>

                                </div>
                                {/* these is the email */}
                                <div className="mt-4">
                                    <InputLabel htmlFor="email" value="Email" className='text-white' />

                                    <TextInput
                                        id="email"
                                        type="email"
                                        name="email"
                                        value={data.email}
                                        className="mt-1 block w-full bg-transparent text-white"
                                        autoComplete="username"
                                        onChange={(e) => setData('email', e.target.value)}
                                        required
                                    />

                                    <InputError message={errors.email} className="mt-2" />
                                </div>
                                {/* these is the actual massage  */}
                                <div className="mt-4">
                                    <InputLabel htmlFor="message" value="Message" className='text-white' />

                                    <Textarea
                                        className='bg-transparent text-white w-full h-40'
                                        id="message"
                                        name='message'
                                        value={data.message}
                                        onChange={(e) => setData('message', e.target.value)}
                                    />

                                    <InputError message={errors.message} className="mt-2" />
                                </div>
                                <div className="mt-4 flex justify-between">
                                    <div>
                                        <Checkbox />
                                        <span className="ms-2 text-sm text-gray-600">
                                            I agree with Terms of Use and Privacy Policy
                                        </span>
                                    </div>
                                    <PrimaryButton className="ms-4 bg-[#E50000] " disabled={processing}>
                                        Register
                                    </PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {/* Add FAQ section */}
                <div className='mt-20' >
                    <FAQ />
                </div>
                {/* Add CTA section */}
                <div className='mt-20' >
                    <CTA />
                </div>
            </div>
            <div className='mt-20' >
                <Footer />
            </div>
        </Main>
    )
}
