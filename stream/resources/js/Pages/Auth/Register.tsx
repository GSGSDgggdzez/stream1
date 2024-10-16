import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import GuestLayout from '@/Layouts/GuestLayout';
import React, { useState, useEffect } from 'react';
import { Head, Link, useForm } from '@inertiajs/react';
import { FormEventHandler } from 'react';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/Components/ui/select';

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        Location: '',
        Date_Birth:'',
    });

    useEffect(() => {
        fetchLocations();
    }, []);


    interface Location {
        id: number | string;
        name: string;
    }


    const [locationOptions, setLocationOptions] = useState<Location[]>([]);


    const fetchLocations = async () => {
        try {
            const response = await fetch('/locations');
            const data = await response.json();
            console.log('Fetched locations:', data);
            // Ensure that data is an array
            if (Array.isArray(data)) {
                setLocationOptions(data);
            } else {
                console.error('Received data is not an array:', data);
                setLocationOptions([]);
            }
        } catch (error) {
            console.error('Error fetching locations:', error);
            setLocationOptions([]);
        }
    };



    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        post(route('register'), {
            onFinish: () => reset('password', 'password_confirmation'),
        });
    };

    return (
        <GuestLayout>
            <Head title="Register" />
            <div className="mb-4 text-center text-5xl font-bold text-white">
                Sign Up
            </div>

            <form onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="name" value="Name" className='text-white' />

                    <TextInput
                        id="name"
                        name="name"
                        value={data.name}
                        className="mt-1 block w-full bg-transparent text-white"
                        autoComplete="name"
                        isFocused={true}
                        onChange={(e) => setData('name', e.target.value)}
                        required
                    />

                    <InputError message={errors.name} className="mt-2" />
                </div>

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

                <div className="mt-4">
                    <InputLabel htmlFor="password" value="Password" className='text-white' />

                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full bg-transparent text-white"
                        autoComplete="new-password"
                        onChange={(e) => setData('password', e.target.value)}
                        required
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel
                        htmlFor="password_confirmation"
                        value="Confirm Password"
                        className='text-white'
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="mt-1 block w-full bg-transparent text-white"
                        autoComplete="new-password"
                        onChange={(e) =>
                            setData('password_confirmation', e.target.value)
                        }
                        required
                    />

                    <InputError
                        message={errors.password_confirmation}
                        className="mt-2"
                    />
                </div>
                {/* these is the location input  */}
                <div className="mt-4">
                    <InputLabel htmlFor="Location" value="Location" className='text-white' />

                    <Select>
                        <SelectTrigger className="w-full">
                            <SelectValue placeholder="Select a country" />
                        </SelectTrigger>
                        <SelectContent>
                            {Array.isArray(locationOptions) && locationOptions.map((location) => (
                                <SelectItem key={location.id} value={location.name}>
                                    {location.name}
                                </SelectItem>
                            ))}
                        </SelectContent>
                    </Select>

                    <InputError message={errors.Location} className="mt-3" />
                </div>
                {/* these is the date of birth */}
                <div>
                    <InputLabel htmlFor="Date_Birth" value="Date Birth" className='text-white' />

                    <TextInput
                        id="Date_Birth"
                        name="Date_Birth"
                        className="mt-1 block w-full bg-transparent text-white"
                        type='date'
                        autoComplete="Date_Birth"
                        isFocused={true}
                        onChange={(e) => setData('Date_Birth', e.target.value)}
                        required
                    />

                    <InputError message={errors.Date_Birth} className="mt-2" />
                </div>
                <div>
                    <InputLabel htmlFor="Date_Birth" value="Date Birth" className='text-white' />

                    <TextInput
                        id="Date_Birth"
                        name="Date_Birth"
                        className="mt-1 block w-full bg-transparent text-white"
                        type='date'
                        autoComplete="Date_Birth"
                        isFocused={true}
                        onChange={(e) => setData('Date_Birth', e.target.value)}
                        required
                    />

                    <InputError message={errors.Date_Birth} className="mt-2" />
                </div>

                <div className="mt-4 flex items-center justify-end">
                    <Link
                        href={route('login')}
                        className="rounded-md text-sm text-white underline hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Already registered?
                    </Link>

                    <PrimaryButton className="ms-4 bg-[#E50000] " disabled={processing}>
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
}
