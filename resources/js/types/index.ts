import { RouteDefinition } from '@/wayfinder';

export * from './auth';

export type LinkPath = string | RouteDefinition<'get'>;

export type HeaderItemLink = {
    title: string;
    path: LinkPath;
};

export type HeaderItemFolder = {
    title: string;
    links: HeaderItem[];
};

export type HeaderItem = HeaderItemLink | HeaderItemFolder;

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
    profile_picture_url: string;
};

export type BlogPost = {
    id: number;
    title: string;
    content: string;
    slug: string;
    created_at: string;
    updated_at: string;
};

export type Paginated<T> = {
    current_page: number;
    data: T[];
    first_page_url: string;
    from: number;
    last_page: number;
    last_page_url: string;
    links: {
        url: string;
        active: boolean;
        label: string;
        page: number;
    }[];
    next_page_url: string;
    path: string;
    per_page: number;
    prev_page_url: string;
    to: number;
    total: number;
};

export const enum RugbyType {
    UNION = 'union',
    TOUCH = 'touch',
}

export type Fixture = {
    id: number;
    type: RugbyType;
    opposition: string;
    location: string;
    start: string;
    result: Record<string, number>;
    has_happened: boolean;
    hurricanes_score: number;
    opposition_score: number;
    report: string;
};

/**
 * FUNCTIONS
 */

export const asLinkPath = (link: HeaderItem) => (link as HeaderItemLink).path;
