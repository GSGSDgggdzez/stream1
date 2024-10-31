export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}

export interface Profile {
    id: number;
    user_id: number;
    Profile_name: string;
    Avatar_url: string | null;
}

export type PageProps = {
    auth: {
        user: User;
        selectedProfile?: Profile;
    };
};
