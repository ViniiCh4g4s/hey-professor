import React from 'react';

interface Props {
    children: React.ReactNode;
}

export default function Container({ children }: Props) {
    return (
        <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">{children}</div>
    );
}
