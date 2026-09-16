export * from './auth';

export type CommitteeMember = {
    id: number;
    name: string;
    role: string;
    description: string;
    sort_order: number;
    pronouns: string | null;
    is_active: boolean;
    created_at: string;
    updated_at: string;
};
