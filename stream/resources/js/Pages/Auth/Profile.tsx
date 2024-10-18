import React from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';
import { Link } from '@inertiajs/react';
import { FormEventHandler } from 'react';
import { useForm } from '@inertiajs/react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import PrimaryButton from '@/Components/PrimaryButton';
import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from "@/Components/ui/popover"

// Define interfaces for User and Profile to ensure type safety
interface User {
    id: number;
    name: string;
    email: string;
}

interface Profile {
    id: number;
    user_id: number;
    Profile_name: string;
    Avatar_url: string | null;
}

// Component to display user profiles or a placeholder if no profiles exist
const Profile: React.FC<{ user: User, profiles: Profile[] }> = ({ user, profiles }) => {


    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        avatar: '',
        id: '',
        });

    const submit: FormEventHandler = (e) => { 
        e.preventDefault();

        post(route('profiles'), {
            onFinish: () => reset('name', 'avatar'),
        });
    };

    // Function to generate random background colors for profile placeholders
    const getRandomColor = () => `#${Math.floor(Math.random() * 0xffffff).toString(16).padStart(6, '0')}`;

    return (
        <GuestLayout>
            <Head title="Profile" />
            {/* Main heading for the profile selection screen */}
            <div className="mb-4 text-center text-3xl font-bold text-white">
                Who Is Watching
            </div>
            <div>
                {/* Container for profile avatars */}
                <div className="flex flex-wrap justify-center gap-4">
                    {profiles.length > 0 ? (
                        // If profiles exist, map over them and display each one
                        profiles.map((profile) => (
                            // Individual profile container
                            <div key={profile.id} className="w-32 h-32 rounded-md overflow-hidden">
                                {profile.Avatar_url ? (
                                    // If profile has an avatar, display it
                                    <img src={profile.Avatar_url} alt={profile.Profile_name} className="w-full h-full object-cover" />
                                ) : (
                                    // If no avatar, show a placeholder with initials on a random background
                                    <div
                                        className="w-full h-full flex items-center justify-center text-6xl font-bold text-white"
                                        style={{ backgroundColor: getRandomColor() }}
                                    >
                                        {/* Display first two letters of the profile name */}
                                        {profile.Profile_name.slice(0, 2).toUpperCase()}
                                    </div>
                                )}
                                {/* Display the profile name below the avatar */}
                                <p className="mt-2 text-center text-white">{profile.Profile_name}</p>
                            </div>
                        ))
                    ) : (
                        // If no profiles, display a single placeholder for the user
                        <div className="w-32 h-32 rounded-md overflow-hidden">
                            {/* Placeholder with user's initials on a random background */}
                            <div
                                className="w-full h-full flex items-center justify-center text-6xl font-bold text-white"
                                style={{ backgroundColor: getRandomColor() }}
                            >
                                {/* Display first two letters of the user's name */}
                                {user.name.slice(0, 2).toUpperCase()}
                            </div>
                            {/* Display the user's name below the placeholder */}
                            <p className="mt-2 text-center text-white">{user.name}</p>
                        </div>
                    )}

                </div>
                <div>
                    {/* manage and add profiles */}
                    <div className='flex flex-wrap justify-center gap-4 mt-4'>
                        <a href="" className="bg-transparent border-white border-2 text-white rounded-md px-4 py-1 hover:border-[#E50000] hover:text-[#E50000]">
                            Edit profile
                        </a>
                        <Popover >
                            <PopoverTrigger className="bg-transparent border-white border-2 text-white rounded-md px-4 py-1 hover:border-[#E50000] hover:text-[#E50000]">New Profile</PopoverTrigger>
                            <PopoverContent className='bg-[#616161da]'>
                                <form onSubmit={submit} >
                                    <TextInput
                                    id="id"
                                    type='hidden'
                                    name='id'
                                    required
                                    value={user.id}
                                    />
                                <div className="">
                                    <InputLabel htmlFor="name" value="name" className='text-black' />

                                    <TextInput
                                        id="name"
                                        type="text"
                                        name="name"
                                        className="mt-1 block w-full bg-transparent text-white"
                                        autoComplete="name"
                                        required
                                        onChange={(e) => setData('name', e.target.value)}
                                    />

                                    <InputError className="mt-2" />
                                </div>
                                <div>
                                    <InputLabel htmlFor="Avatar" value="Avatar" className='text-black' />

                                    <TextInput
                                        id="avatar"
                                        type="file"
                                        name="avatar"
                                       className="mt-1 block w-full bg-transparent text-white"
                                       required
                                       onChange={(e) => setData('avatar', e.target.value)}
                                    />

                                    <InputError className="mt-2" />
                                </div>
                                </form>
                            </PopoverContent>
                        </Popover>
                    </div>
                </div>
            </div>
        </GuestLayout>
    );
};

export default Profile;


// To create this basic structure quickly, you can use the following snippet:
// rfc<Tab>
// This snippet expands to create a React Functional Component
