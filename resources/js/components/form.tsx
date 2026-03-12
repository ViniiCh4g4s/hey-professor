import { Form as InertiaForm } from '@inertiajs/react';

interface Props {
    action: string;
    post?: boolean;
    put?: boolean;
    patch?: boolean;
    delete?: boolean;
    className?: string;
    children: React.ReactNode | ((props: { errors: Record<string, string> }) => React.ReactNode);
}

export default function Form({ action, put, patch, delete: del, className, children }: Props) {
    const method = del ? 'delete' : put ? 'put' : patch ? 'patch' : 'post';

    return (
        <InertiaForm action={action} method={method} className={className}>
            {children as any}
        </InertiaForm>
    );
}
